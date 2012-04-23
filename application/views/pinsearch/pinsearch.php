<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>KRA Pin Search App::</title>
    </head>
    <body>
        <h1>KRA PIN Search App::</h1>
        <h3>Enter your valid Pin Click on Search::</h3>
        <?php
            echo form_open('pinsearch/render_pin');
            echo form_label('KRA PIN ::');
            echo form_input('kra_pin');
            echo form_submit('submit', 'Search');
        ?>
        <div style="color:red;font-size: 12px"><?= $message ?></div>
    </body>
</html>
