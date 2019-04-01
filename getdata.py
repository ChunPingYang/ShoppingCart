import requests
from bs4 import BeautifulSoup

#根据steam网页的命名规则
i =1

while i<5:
    url = "https://store.steampowered.com/search/?filter=globaltopsellers&page=" + str(i) + "&os=win"
    s = requests.session()
    res = s.get(url).text
    soup = BeautifulSoup(res, "html.parser")
    contents = soup.find(id="search_result_container").find_all('a')

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
            print("******************")
        except:
            print("error")
    i = i + 1