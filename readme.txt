Box Model - A pattern for Real-life Web Programming
(c) 2012 Philippe Thomassigny

Box Model is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

Box Model is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Dominion.  If not, see <http://www.gnu.org/licenses/>.

----

Welcome to Box Model v1.

You need to install the box directory into your application somewhere accesible by your scripts to include box model scripts.

Once the directory is installed, just call the needed scripts and build your code !

Reference, manuals, examples: http://www.webability.info/?P=box
Follow us on twitter: @webability5

Thank you !

----

Languages:
EN - English language, native language
FR - French language, maintained by Philippe Thomassigny
ES - Spanish language, maintained by Philippe Thomassigny
NL - Dutch language, maintained by Roland van Wanrooy, abo at wanrooy dot be

----

Box Model v1 integrates DomCore into its structure. DomCore files libraries are copied into include/core, include/datasources and include/throwables

This is the build 7

- Change the build:
  edit Box.lib at the beginning and change the version number
  change this file and add comments on new build.

Important notes:

To do:
- Add set/get directly in boxes to read and set input/outputs instead of calling methods
- listBox
- enginebox Source ?
- examples for any box of the catalog example
- integrate new example as press room ? blog ? etc

----

Build 7: 2012/05/25:
- DomCore upgraded to 1.01.08 (template bug)
- New example added using the same boxes as the first example to show reusability

Build 6: 2012/05/17:
- Error corrected into engineBox to read the descriptor (bad variable name)
- parameterBox modified to use parameters input
- DomCore upgraded to 1.01.07
- Examples modified to meet bootstrap-like design for responsive web design

Build 5: 2012/03/27:
- parameterBox implemented
- Example of product catalog with XML and parameterBox added

Build 4: 2012/03/21:
- Messages adjusted to include DomCore messages
- translation to Netherland (NL - Dutch) added
- Markups added into XML language files to extract and insert entries automatically
- Messages added to engineBox contructor to use WAMessage
- Messages added to Box contructor to use WAMessage
- New messages added to the XML languages

Build 3: 2012/03/04:
- Box modified to support also TemplateSource and LanguageSource as inputs
- engineBox modified to read an XML file as flow definition

Build 2: 2012/02/28:
- Box modified to load template file and language file if the entry string is a file
- engineBox modified to read an XML file as flow definition

Build 1: 2012/02/17:
- First release

----
