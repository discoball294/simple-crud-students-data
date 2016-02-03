<?php

/*
 * Example PHP implementation used for the index.html example
 */

// DataTables PHP library
include("php/DataTables.php");

// Alias Editor classes so they are easy to use
use
    DataTables\Editor,
    DataTables\Editor\Field,
    DataTables\Editor\Format,
    DataTables\Editor\Join,
    DataTables\Editor\Upload,
    DataTables\Editor\Validate;

// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'students' )
    ->fields(
        Field::inst( 'nim' )->validator( 'Validate::notEmpty' ),
        Field::inst( 'nama' )->validator( 'Validate::notEmpty' ),
        Field::inst( 'tgl_lahir' )
            ->validator( 'Validate::dateFormat', array(
                "format"  => Format::DATE_ISO_8601,
                "message" => "Please enter a date in the format yyyy-mm-dd"
            ) )
            ->getFormatter( 'Format::date_sql_to_format', Format::DATE_ISO_8601 )
            ->setFormatter( 'Format::date_format_to_sql', Format::DATE_ISO_8601 ),
        Field::inst( 'jk' ),
        Field::inst( 'alamat' )
    )
    ->process( $_POST )
    ->json();