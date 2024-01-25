<?php

$printer_name = "BP-LITE 80D+80X Printer"; 
$handle = printer_open($printer_name);
printer_start_doc($handle, "My Document");
printer_start_page($handle);
$font = printer_create_font("Arial", 100, 100, 400, false, false, false, 0);
printer_select_font($handle, $font);
printer_draw_text($handle, 'This sentence should be printed.', 100, 400);
printer_delete_font($font);
printer_end_page($handle);
printer_end_doc($handle);
printer_close($handle);


