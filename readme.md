#Välkommmen till Wooly
Wooly är ett mvc-inspirerat ramverk. 
##Så här kan du komma igång:
+ Clona från github till din webbserver, alternativt ladda ner en zip med alla filer och lägg upp på din webbserver via t ex ftp.

+ Se till att ändra rättigheterna på mappen site/data och allt dess innehåll till chmod 777.

+ Gå till den adress i din webbläsare där du installerat Wooly. Tex www.mysite.com

+ Du kan också behöva ändra i .htaccess-filen så den pekar på rätt adress.

+ Om installationen lyckats ska sidan säga ”Index Controller Welcome to Wooly!” Du ser en snabbguide över installationen.
##Anpassa
Du kan ändra namn och logo genom att ändra i din `config.php` som ligger i site-mappen. I site-mappen kan du också lägga till fler controllers eller skapa ett eget tema om du vill. 
 
+ I config.php har du `$wo->config['theme']` och kan där ändra tex ’header’ för sidans namn. Vill du ändra logo skriver du in filens namn och lägger upp själva filen i site/themes/det-tema-du-använder. I `$wo->config['menus']` kan du lägga till din egen navigeringsmeny. Den som används väljer du sedan i `$wo->config['theme']`

+ Det finns ett tema som heter mytheme som du kan använda om du vill. Ändra i css-filen för att byta utseende på sidan.
##Lägg till innehåll
Du kan enkelt skapa både bloginlägg och statiska sidor med Wooly.

+ För att skapa en ny sida med innehåll går du till [mysite.com/content/create](#). Där kan du snabbt skapa innehåll till din sida med tex bbcode. Ange ”page” som type i formuläret för att skapa en statisk sida.

+ Vill du skriva en blogpost gör du samma sak men anger ”blog” istället för page som type.