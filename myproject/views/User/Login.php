<?php

/**
 * Created by IntelliJ IDEA.
 * User: adi
 * Date: 05.11.2015
 * Time: 09:54
 */

namespace View;






class LogIn
{
    function render()
    {
        $html = '<html><form method="post" action="/user/editmore/">



    <div>
    <label for="Lastname" >
    lastname:
    </label>
    <input id="Lastname" name="Lastname" value="Nachname" required>
    </div>


        <label for="Password">
    Password:
    </label>
    <input id="Password" type="password" name="Password" required>
    </div>

    <button type="submit" name="submit-button" value="Submit">
    Senden!
    </button>
    </body>
    </html>';
        echo $html;
    }
}