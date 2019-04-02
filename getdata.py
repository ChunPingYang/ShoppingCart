import requests
from bs4 import BeautifulSoup

#根据steam网页的命名规则
i =1

while i<2:

    url = "https://store.steampowered.com/search/?filter=globaltopsellers&page=" + str(i) + "&os=win"
    s = requests.session()
    res = s.get(url).text
    soup = BeautifulSoup(res, "html.parser")
    contents = soup.find(id="search_result_container").find_all('a')   #find with tag

    for content in contents:
        try:
            name = content.find(class_="title").string.strip()
            date = content.find("div",class_="col search_released responsive_secondrow").string.strip()
            price= content.find("div",class_="col search_price responsive_secondrow").string.strip()
            img_src = content.find("div",class_="col search_capsule").find('img').get("src")
            href=content.get("href")
            print(name)
            print(href)
            print(date)
            print(price)
            print(img_src)
            
            sub_s=requests.session()
            sub_res = sub_s.get(href).text
            sub_soup = BeautifulSoup(sub_res,"html.parser")
            sub_contents = sub_soup.find_all("div",class_="screenshot_holder")
            sub_headimg = sub_soup.find("img",class_="game_header_image_full").get("src")
            sub_desc=sub_soup.find("div",id="game_area_description")
            clear_desc =BeautifulSoup(str(sub_desc),'lxml').div.text.replace('\xa0',"").strip()
            company = sub_soup.find("div",id="developers_list").find("a").string.strip().replace("About This Game","")
            print(clear_desc)
            print(sub_headimg)
            print(company)
            #for sub_con in sub_contents:

               # url = sub_con.find("a").get("href")
               # print(url)
            

            print("******************")

        except:
            print("")

    i = i + 1