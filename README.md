PDF TOC Parser
=========

### Purpose

Given a pdf with toc content, use pdftk and this php file to generate array of articles

### Usage 

install pdftk

~~~sh
$ pdftk path/to/pdfFile.pdf dump_data output Toc.txt
$php parser.php

~~~

###Note
