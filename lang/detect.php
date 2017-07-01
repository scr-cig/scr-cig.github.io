<?php

if(!isset($_SESSION)) { session_start(); } 

if (isset($_SESSION['CountryCode']))
{

    switch ($_SESSION['CountryCode']) {

        /* Frensh */
        case "FR":
            include __DIR__."/fr.php";
            break;
        case "DZ":
            include __DIR__."/fr.php";
            break;
        case "MA":
            include __DIR__."/fr.php";
            break;
        case "TN":
            include __DIR__."/fr.php";
            break;
        case "CD":
            include __DIR__."/fr.php";
            break;
        case "MG":
            include __DIR__."/fr.php";
            break;
        case "CM":
            include __DIR__."/fr.php";
            break;
        case "CA":
            include __DIR__."/fr.php";
            break;
        case "CI":
            include __DIR__."/fr.php";
            break;
        case "BF":
            include __DIR__."/fr.php";
            break;
        case "NE":
            include __DIR__."/fr.php";
            break;
        case "SN":
            include __DIR__."/fr.php";
            break;
        case "ML":
            include __DIR__."/fr.php";
            break;
        case "RW":
            include __DIR__."/fr.php";
            break;
        case "BE":
            include __DIR__."/fr.php";
            break;
        case "GF":
            include __DIR__."/fr.php";
            break;
        case "TD":
            include __DIR__."/fr.php";
            break;
        case "HT":
            include __DIR__."/fr.php";
            break;
        case "BI":
            include __DIR__."/fr.php";
            break;
        case "BJ":
            include __DIR__."/fr.php";
            break;
        case "CH":
            include __DIR__."/fr.php";
            break;
        case "TG":
            include __DIR__."/fr.php";
            break;
        case "CF":
            include __DIR__."/fr.php";
            break;
        case "CG":
            include __DIR__."/fr.php";
            break;
        case "GA":
            include __DIR__."/fr.php";
            break;
        case "KM":
            include __DIR__."/fr.php";
            break;
        case "GK":
            include __DIR__."/fr.php";
            break;
        case "DJ":
            include __DIR__."/fr.php";
            break;
        case "LU":
            include __DIR__."/fr.php";
            break;
        case "VU":
            include __DIR__."/fr.php";
            break;
        case "SC":
            include __DIR__."/fr.php";
            break;
        case "MC":
            include __DIR__."/fr.php";
            break;



        /* Espagnol */
        case "MX":
            include __DIR__."/es.php";
            break;
        case "PH":
            include __DIR__."/es.php";
            break;
        case "ES":
            include __DIR__."/es.php";
            break;
        case "CO":
            include __DIR__."/es.php";
            break;
        case "AR":
            include __DIR__."/es.php";
            break;
        case "PE":
            include __DIR__."/es.php";
            break;
        case "VE":
            include __DIR__."/es.php";
            break;
        case "CL":
            include __DIR__."/es.php";
            break;
        case "EC":
            include __DIR__."/es.php";
            break;
        case "GT":
            include __DIR__."/es.php";
            break;
        case "CU":
            include __DIR__."/es.php";
            break;
        case "HN":
            include __DIR__."/es.php";
            break;
        case "PY":
            include __DIR__."/es.php";
            break;
        case "SV":
            include __DIR__."/es.php";
            break;
        case "NI":
            include __DIR__."/es.php";
            break;
        case "CR":
            include __DIR__."/es.php";
            break;
        case "UY":
            include __DIR__."/es.php";
            break;
        


        /* Italie */
        case "IT":
            include __DIR__."/it.php";
            break;
        case "SM":
            include __DIR__."/it.php";
            break;



        /* Russe */
        case "RU":
            include __DIR__."/ru.php";
            break;
        case "BY":
            include __DIR__."/ru.php";
            break;
        case "KZ":
            include __DIR__."/ru.php";
            break;
        case "KG":
            include __DIR__."/ru.php";
            break;
        case "TJ":
            include __DIR__."/ru.php";
            break;



        /* Pt */
        case "PT":
            include __DIR__."/pt.php";
            break;
        case "BR":
            include __DIR__."/pt.php";
            break;
        case "AO":
            include __DIR__."/pt.php";
            break;
        case "MZ":
            include __DIR__."/pt.php";
            break;
        case "MO":
            include __DIR__."/pt.php";
            break;



        /* Turk */
        case "TR":
            include __DIR__."/tr.php";
            break;
        case "CY":
            include __DIR__."/tr.php";
            break;



        /* PL */
        case "PL":
            include __DIR__."/pl.php";
            break;



        /* NO */
        case "NO":
            include __DIR__."/no.php";
            break;



        /* NL */
        case "NL":
            include __DIR__."/nl.php";
            break;
        case "AW":
            include __DIR__."/nl.php";
            break;



        /* DE */
        case "DE":
            include __DIR__."/de.php";
            break;
        case "CH":
            include __DIR__."/de.php";
            break;


        default:
            include __DIR__."/en.php";
    }
}
else
{
    include __DIR__."/en.php";
}