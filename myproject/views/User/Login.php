<?php

/**
 * Created by IntelliJ IDEA.
 * User: adi
 * Date: 05.11.2015
 * Time: 09:54
 */

namespace View;


class LogIn extends View
{
    function render()
    {
        $html = '<form role="form">
    <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email" class="form-control" id="email">
    </div>
    <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd">
    </div>
    <div class="checkbox">
        <label><input type="checkbox">Remember me</label>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>';
        return $html;
    }
}