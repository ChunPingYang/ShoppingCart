var x, i, j, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
//x = document.getElementsByName("sort");
                                  console.log("length: "+x.length);
for (i = 0; i < x.length; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
                                  console.log("element tag name: "+selElmnt.tagName);
  //console.log("selElmnt: "+selElmnt.length);
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
                                  console.log(x[0].getAttribute("name"));
                                  console.log("selElmnt length: "+selElmnt.length);
//different actions use different attribute id
// if(x[0].getAttribute("name") == "sort"){
//   b.setAttribute("id", x[0].getAttribute("name"));
// }else if(x[0].getAttribute("class") == "viewPage"){

// }

  for (j =0; j < selElmnt.length; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;

    //different actions use different functions
    // if(x[0].getAttribute("name") == "sort"){
    //   //c.setAttribute("onclick","sort()"); //Jason add
    // }else if(x[0].getAttribute("class") == "viewPage"){

    // }

    c.setAttribute("value",j);//Jason add
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        h = this.parentNode.previousSibling; //最上層要顯示的
        for (i = 0; i < s.length; i++) {
          console.log(this.innerHTML);
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            for (k = 0; k < y.length; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();

        //console.log(document.getElementById("sort")); //可以取到id
        if(x[0].getAttribute("name") == "sort"){
          console.log(this);
            sort(this);
        }else if(x[0].getAttribute("name") == "viewPage"){

        }
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);

  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}

function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  for (i = 0; i < y.length; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < x.length; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}

/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);

function sort(element){
  var i, switching, a,b, shouldSwitch, dir, switchcount = 0;
  var value = element.getAttribute("value");
  console.log("value: "+value);
  switching = true;

  if(value == 0){ //TODO rate sort

  }else if(value == 1){ //ASC

    while(switching){
        // Start by saying: no switching is done:
        switching = false;
        a = document.getElementsByTagName("article");
        b = document.getElementsByName("price");
        console.log("list length: "+b.length);
        // Loop through all list-items:
        for(i=0;i<b.length-1;i++){
            // Start by saying there should be no switching:
            shouldSwitch = false;
            /* Check if the next item should switch place with the current item*/
            if(Number(b[i].innerHTML) > Number(b[i+1].innerHTML)){
              shouldSwitch = true;
              break;
            }
        }
        if(shouldSwitch){
            /* If a switch has been marked, make the switch
            and mark that a switch has been done: */
            a[i].parentNode.insertBefore(a[i+1],a[i]);
            switching = true;
        }
    }

  }else if(value == 2){ //DSC

      while(switching){
        // Start by saying: no switching is done:
        switching = false;
        a = document.getElementsByTagName("article");
        b = document.getElementsByName("price");
        console.log("list length: "+b.length);
        // Loop through all list-items:
        for(i=0;i<b.length-1;i++){
            // Start by saying there should be no switching:
            shouldSwitch = false;
            /* Check if the next item should switch place with the current item*/
            if(Number(b[i].innerHTML) < Number(b[i+1].innerHTML)){
              shouldSwitch = true;
              break;
            }
        }
        if(shouldSwitch){
            /* If a switch has been marked, make the switch
            and mark that a switch has been done: */
            a[i].parentNode.insertBefore(a[i+1],a[i]);
            switching = true;
        }
    }

  }

}


