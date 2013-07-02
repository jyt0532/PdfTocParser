PDF TOC Parser
=========

### Purpose

Given a pdf with toc content, use pdftk and this php file to generate array of articles

### Usage 

install pdftk

~~~sh
$ pdftk path/to/pdfFile.pdf dump_data output Toc.txt
$ php parser.php
~~~

- outputArticles will be:

      [
        {
          "title" : "..."
          , "level": "..."
          , "pageNumber": "..."
        }
      ]

###Note

pdf with toc have two layers, publishers use different strategy to display their content, so you have to check contents in which layer is exacly what you want
