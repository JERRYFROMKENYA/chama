<div class="footer">
    <div class= "wrapper">
          <p class="text-center">©2022 ALL RIGHTS RESERVED. Developed for <a href="#">CHAMA</a> by <a href="github.com/JERRYFROMKENYA">JERRYFROMKENYA.</a> </p>
        </div>
    </div>
    </body>   
    <?php
    $vars = array_keys(get_defined_vars());
    for ($i = 0; $i < sizeOf($vars); $i++) {
        unset($$vars[$i]);
    }
    unset($vars,$i);
    ?> 
</html>