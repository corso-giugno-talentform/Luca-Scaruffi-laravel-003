<?php

namespace App\Models; // Indica che questa classe appartiene al namespace 'App\Models'.
// Tutti i modelli Eloquent di Laravel si trovano tipicamente qui.

use Illuminate\Database\Eloquent\Model; // Importa la classe base 'Model' da Laravel.
// Tutti i modelli della tua applicazione devono estendere questa classe
// per ottenere le funzionalità di Eloquent ORM (Object-Relational Mapping).

class Book extends Model // Definisce il modello 'Book'.
{                           // Per convenzione, Laravel assume che questo modello sia collegato
    // alla tabella 'books' (plurale del nome del modello).

    // protected $fillable: Questa proprietà è fondamentale per la "Mass Assignment Protection" di Laravel.
    // Specifica un array di attributi (nomi delle colonne del database) che possono essere
    // assegnati massivamente (cioè, inseriti o aggiornati tramite un array di dati,
    // come quelli provenienti da un form).
    // Senza questa protezione, Laravel bloccherebbe l'assegnazione di massa per motivi di sicurezza,
    // prevenendo l'inserimento accidentale o malevolo di dati in colonne non previste.
    protected $fillable = ['name', 'pages', 'year'];
}
