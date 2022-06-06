# GREETING FRAMES: PERSONALIZED GREETING

![Example image](https://raw.githubusercontent.com/vish4395/php-greeting-frame/master/images/footerbar.jpg)
# CARD GENERATOR SCRIPT

### INTRODUCTION
It is a core php website for easy greeting pack making for a user. It puts a user photo and name on pre-made greeting images. It is simple to make greeting templates and host to website.

#### FEATURES
1. Single step greeting maker
2. Personalized preview: It looks like a personalized album
3. Reactions on greetings
4. FB Comments integrated
5. Auto fetch detail of category from Wikipedia
6. No Database required
7. PHP GD library used
8. 4 images layouts premade
9. 200+ greeting premade added with this pack
10. Easy to setup
11. Based on filesystem


### HOW TO SETUP
#### 1. SETUP FIRST SITE URL
1. Open “index.php” file from root folder and replace
    http://localhost/vs/badhaidilse/bdsn-Copy/
     your site url
2. Replace in header.php
1. $bds_site_url="http://BadhaiDilSe.in";

#### 2. SETTING LOGO
1. Replace “logo.jpeg” with your logo file in root folder or set url in “header.php

#### 3. SETTING SITE NAME
1. Replace “BadhaiDilSe.in” in “header.php”
    1. $bds_site_name="BadhaiDilSe.in";
    2. $bds_site_url="http://BadhaiDilSe.in";

#### 4. REQUIREMENTS
1. allow_url _fopen= 1
2. PHP GD Library

### MANAGE FRAMES / GREETINGS

#### 1. ADD CATEGORY
1. Just add a new folder in Greetings folder
2. Name must be in URL format like no special format. See example folders already with pack.


#### 2. ADD GREETING/FRAMES
```
All the greeting / frames are stored in categories in Greetings folder/directory
```
1. Rectangle - One
```
Name must be in following format: frame_{CategoryName}_{numbering}.jpg
example: frame_Anniversary_02.jpg
saved in `.jpg` format | Size: 948 x 440 px
```
![Example rectangle one image](https://raw.githubusercontent.com/vish4395/php-greeting-frame/master/frame_GN_09.jpg)

2. Rectangle - Two
```
Name must be in following format: frame_{CategoryName}_{numbering}.png
example: frame_bday_06.png
saved in `.png` format with transparency | Size: 948 x 440 px
```
![Example rectangle Two image](https://raw.githubusercontent.com/vish4395/php-greeting-frame/master/Greetings/Birthday/frame_bday_06.png)

3. Square – One
```
Name must be in following format: frame_sqr_lay-{layout _number}_{CategoryName}_{numbering}.jpg
example: frame_sqr_lay-1_Good-Morning_32.jpg
s aved in .jpg format | Si ze: 500x500px
```
![Example Square One image](https://raw.githubusercontent.com/vish4395/php-greeting-frame/master/Greetings/Love/frame_sqr_lay-1_Love_8.jpg)

4. Square – Full

```
Name must be in following format: frame_ CategoryName}_{numbering}.png
example: frame_quote_square_06.png
saved in .png format | Size: 500x500px
```
![Example Square Full image](https://raw.githubusercontent.com/vish4395/php-greeting-frame/master/Greetings/Square/frame_quote_square_06.png)

## *Put image frame only on where examples have.


### MANAGE LAYOUTS (ONLY FOR SQUARE - ONE)

```
All the Layouts are stored in Layouts directory
```
```
Size: 500x500px transparent PNG format image
```
### FOR ANY HELP WRITE A MAIL: VISHALS4395@GMAIL.COM


