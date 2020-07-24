<?php

$aLang = [
    "SHOP_MODULE_GROUP_sp_basics" => "Basis-Einstellungen",
    "SHOP_MODULE_GROUP_sp_cookie_groups" => "Cookie-Individuelle-Einstellungen",
    "SHOP_MODULE_spsamesite_on" => "aktiv",
    "HELP_SHOP_MODULE_spsamesite_on" => "Setzen Sie hier einen Hacken wenn Sie mit der Konfiguration fertig sind",
    "SHOP_MODULE_spsamesite_fallback_mode" => "Modus für unbekannte Cookies",
    "HELP_SHOP_MODULE_spsamesite_fallback_mode" => "Wählen Sie hier den Samesite-Modus für Cookies,
     die unten nicht aufgeführt sind. In der Regel bietet 'lax' einen guten Kompromiss sofern Sie die wichtigen Cookies
     unten bereits definiert haben",
    "SHOP_MODULE_spsamesite_fallback_mode_strict" => "strict",
    "SHOP_MODULE_spsamesite_fallback_mode_lax" => "lax",
    "SHOP_MODULE_spsamesite_fallback_mode_none" => "none",
    "SHOP_MODULE_spsamesite_strict" => "strict",
    "HELP_SHOP_MODULE_spsamesite_strict" => "Tragen Sie hier Cookies ein die besonders Schützenswert sind und
     unbeabsichtigt übertragen werden dürfen weil Sie zur Genehmigung von Aktion benutzt werden. In der Regel tragen 
     Sie hier den CSRF-Token ein. Das Eintragen der Session ID 'sid' kann die Sicherheit erhöhen,
     gehen aber zu Lasten der Benutzerfreundlichkeit und ist deshalb in der Regel nicht die erste Wahl der Absicherung",
    "SHOP_MODULE_spsamesite_lax" => "lax",
    "HELP_SHOP_MODULE_spsamesite_lax" => "Die hier aufgeführten Cookies werden immer übertragen wenn der Nutzer
     eine Aktion tätigt z.B. einen Link klickt. 
     Nutzen sie dieses Feld für gewöhnliche Cookies aber nicht für besonders schützenswerte Cookies wie z.B. den
     CSRF-Tokens. Wenn Sie Session Id Cookies wie z.B. 'sid'-Cookie hier eintragen, stellen Sie sicher, dass 
     Sie weiterhin einen zusätzlichen Schutz über CSRF-tokens aktiv haben",
    "SHOP_MODULE_spsamesite_none" => "none",
    "HELP_SHOP_MODULE_spsamesite_none" => "Die hier aufgeführten Cookies werden immer übertragen
     auch wenn die Aktion nicht vom Nutzer selbst veranlasst wurde.
     Nutzen Sie dieses Feld nur wenn die Seite ausschließlich über HTTPS erreichbar ist und nur für Cookies die
     nicht sicherheitsrelevant sind.
     "

];
