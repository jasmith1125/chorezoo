Joyce Smith  
DWA15, Project 3  
October 30, 2014

**Live URL:** [http://p3.jasmith1125.me](http://p3.jasmith1125.me)

**Demo Information:** Jing screencast URL: [http://screencast.com/t/ZICxxdSNu1](http://screencast.com/t/ZICxxdSNu1)

**Description:** This project demonstrates that I have a basic understanding of working within the Laravel framework, including generating routes and views, working with Composer packages, creating and validating forms, and deploying a Laravel app to a live server. 

**Details for teaching team:**  
My customized CSS is in the project folder: css/app.css; this validates via WC3 standards.  

My logic is mainly in routes.php; logic to print "muttlem ipsum" text is on the view page due to "resource error 138" generated when I tried to put this in routes. 

My original intention with the text generator was to offer a choice of three different text types: lorem ipsum, scrambled doggerel, and  "muttlem ipsum" that includes a mix of Latin and doggerel. I don't currently have the coding skills to pull that off, so attempted an experiment where I edited the word list in the Badcow generator to include some doggerel. This worked fine to generate "muttlem ipsum" locally. I figured I could toss "gitignore" for the vendors file and version control the Badcow generator I had edited. So I pushed that to github. HUGE, HUGE MISTAKE! When I deployed project 3 to Digital Ocean, I realized that the vendor files were completely scrambled and the app was unviewable on the live server. Put vendors back in "gitignore," regenerated Badcow and all vendors, pushed the changed version to github, completely removed p3 from D.O. and tried to redeploy the repaired files. That was a "no go," when I did Composer update on D.O. I would see a bunch of vendor garbage deploy and would get a message "nothing new to add"--somehow the messed-up vendor files were still lurking around fouling up the process. Thinking the polluted files were coming from github and not seeing them in the repository, I ultimately destroyed my project3 repo and recreated the project in a new repository. When that didn't correct the problem and after taking a closer look at the code generated within the droplet, I finally realized what I needed to do was clear the cache over there (I had thought the power cycle did that, but that is not the case).   

**There is a PNG file called "p3-commitHistory.png" in my project file that shows my commit history prior to destroying the original repo.**

All pages validate via WC3 HTML standards. I tried to make the generators as user friendly as possible by including the following features:  
1. Error messages to direct users toward valid input.   
2. Font color differentiation for generated text and user data.  
3. Footer navigation links.

Features I would like to add:
1. Text generator: paragraph size options, text type options for randomly generated text.
2. User generator: checkboxes to offer options re email address, mailing address, phone number, user profile, etc. (rather than current preset data fields).

**Outside resources:**  
1. I used Zurb Foundation 5 framework, source:  [http://foundation.zurb.com/](http://foundation.zurb.com/)  
2. Fonts are from Google Fonts: [https://www.google.com/fonts/](https://www.google.com/fonts/)  
3. William Topaz McGonagall poetry used within "muttlem ipsum" was found online: [http://www.poemhunter.com/william-topaz-mcgonagall/](http://www.poemhunter.com/william-topaz-mcgonagall/)  
4. Dog photo in the banner is a personal photo of my family dawg.  
5. Background texture is from [http://www.subtlepatterns.com](http://www.subtlepatterns.com)