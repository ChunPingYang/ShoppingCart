<link href="./css/productList.page.css" rel='stylesheet' type='text/css' />
<?php

    class Paginator {

        private $_conn;
        private $_limit;
        private $_query;
        private $_total;
        private $_rs;
        private $_num_rows;


        public function __construct($conn, $query){

            $this->_conn = $conn;
            $this->_query = $query;

            $rs = $this->_conn->query($this->_query);
            $this->_num_rows = $rs->num_rows;
            $this->_total = $rs->num_rows;
        }

        public function getResult(){
            return $this->_num_rows;
        }

        public function getData($limit = 3, $page = 1){

            $this->_limit = $limit;
            $this->_page = $page;

            if($this->_limit == 'all'){
                $query = $this->_query;
            }else{
                $query = $this->_query." LIMIT ".(($this->_page - 1) * $this->_limit).", $this->_limit";
            }
            
            $rs = $this->_conn->query($query);
            
            while($row = $rs->fetch_array()){
                $results[] = $row;
            }

            $result = new stdClass();
            $result->page = $this->_page;
            $result->limit = $this->_limit;
            $result->total = $this->_total;
            $result->data = $results;

            return $result;
        }

        public function createLinks($links,$list_class,$option){
            if($this->_limit == 'all'){
                return '';
            }

            $last = ceil($this->_total / $this->_limit);

            $start = (($this->_page - $links) > 0)? $this->_page - $links : 1;
            $end = (($this->_page + $links) < $last) ? $this->_page + $links : $last;

            $html = '<ul class="' . $list_class . '">';
            
            $class = ( $this->_page == 1 ) ? "disabled" : "";
            $html .= '<li class="' . $class . '"><a class="' . $class . '" href="?limit=' . $this->_limit . '&page=' . ( $this->_page - 1 ) . '&option=' . $option . '">&laquo;</a></li>';

            if ( $start > 1 ) {
                $html .= '<li><a href="?limit=' . $this->_limit . '&page=1&option=' . $option . '">1</a></li>';
                $html .= '<li class="disabled"><span>...</span></li>';
            }

            for ( $i = $start ; $i <= $end; $i++ ) {
                $class  = ( $this->_page == $i ) ? "active" : "";
                $html  .= '<li class="' . $class . '"><a href="?limit=' . $this->_limit . '&page=' . $i . '&option=' . $option . '">' . $i . '</a></li>';
            }

            if ( $end < $last ) {
                $html .= '<li class="disabled"><span>...</span></li>';
                $html .= '<li><a href="?limit=' . $this->_limit . '&page=' . $last . '&option=' . $option . '">' . $last . '</a></li>';
            }

            $class = ( $this->_page == $last) ? "disabled" : "";
            $html .= '<li class="' . $class . '"><a class="' . $class . '" href="?limit=' . $this->_limit . '&page=' . ( $this->_page + 1 ) . '&option=' . $option . '">&raquo;</a></li>';
        
            $html .= '</ul>';

            return $html;
        }

    }

?>