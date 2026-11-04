<?php
function formatDate(string $date):string{
    return date("d/m/Y",strtotime($date));
}