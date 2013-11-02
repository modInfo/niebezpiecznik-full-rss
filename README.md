Pełny RSS dla Niebezpiecznik.pl
-------

Jeżeli chcesz mieć pełne wpisy Twojego ulubionego blogu na Twoim czytniku RSS zamiast tylko 2 pierwsze zdania a pożniej musisz przejść na stronę aby przeczytać pełny wpis, to od dziś możesz to zmienić za pomocą pełnego feeda z wpisami.

  - Potrzebujesz: MySQL i PHP
  - Opcjonalnie: dostęp do shellu do ustawiania automatycznego aktualizowania feeda z crona


Instalacja
--------------

* dodajesz baze.sql do swojego MySQL
* podajesz swoje dane do bazy w db.php
* plik function.php jest odpowiedzialny za pobieranie nowych adresów wpisów
* plik rss.php generuje feed

Przykład użycia z shell (zalecane):

    $ php /root/niebezpiecznik/function.php
    $ php /root/niebezpiecznik/rss.php > /var/webpages/rss/niebezpiecznik/rss.xml

Przykład użycia z www: 

    $ http://example.com/function.php?auth_key=XXXXXXXXXXXXXXX
    $ http://example.com/rss.php


License
-------
MIT

Free Software, Fuck Yeah!
