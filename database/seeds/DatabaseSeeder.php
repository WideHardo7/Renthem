<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run() {

        DB::table('annunci')->insert([
            ['AnnuncioId' => '1',
             'IDproprietario' => '1',
             'citta' => 'Ancona',               
             'zona-quartiere' => 'Q1',
             'indirizzo' => 'via brecce bianche 12',
             'descrizione' => 'appartamento',
             'importo' => '750',
             'dimensione' => '70',
             'tipologia' => 'Appartamento',
             'data-inizio-disponibilita' => date("2022-05-15"),
             'data-fine-disponibilita' => date("2023-06-15"),
             'servizi-inclusi' => 'lavastoviglie garage',
             'eta-minima' => '19',
             'genere-richiesto' => 'maschio',
             'assegnato' => '0',               
             'data-assegnazione' => null,
             'immagine' => 'Appartamento1.jpg',
             'C-numero-posti-letto' => null,
             'C-presenza-angolo-studio' => null,
             'A-numero-camere' => '1',
             'A-numero-posti-letto' => '1',
             'A-presenza-cucina' => '1',
             'A-presenza-locale-ricreativo' => '1',
             'A-servizi-disponibili' => 'parcheggio',
             'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s")],
            
            ['AnnuncioId' => '2',
             'IDproprietario' => '1',
             'citta' => 'Ancona',               
             'zona-quartiere' => 'Q2',
             'indirizzo' => 'via flavia 25',
             'descrizione' => 'camera spaziosa',
             'importo' => '220',
             'dimensione' => '18',
             'tipologia' => 'Camera',
             'data-inizio-disponibilita' => date("2022-02-17"),
             'data-fine-disponibilita' => date("2023-03-17"),
             'servizi-inclusi' => 'lavastoviglie garage',
             'eta-minima' => '19',
             'genere-richiesto' => null,
             'assegnato' => '0',               
             'data-assegnazione' => null,
             'immagine' => 'Camera1.jpg',
             'C-numero-posti-letto' => '1',
             'C-presenza-angolo-studio' => '1',
             'A-numero-camere' => null,
             'A-numero-posti-letto' => null,
             'A-presenza-cucina' => null,
             'A-presenza-locale-ricreativo' => null,
             'A-servizi-disponibili' => 'parcheggio',
             'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s")],
        ]);

        DB::table('faq')->insert([
            ['FaqId' => '1',
             'domanda' => 'lore',
             'risposta' => 'lore',               
             'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s")],
            
            ['FaqId' => '2',
             'domanda' => 'lore',
             'risposta' => 'lore',               
             'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s")],
            
            ['FaqId' => '3',
             'domanda' => 'lore',
             'risposta' => 'lore',               
             'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s")],
            
            ['FaqId' => '4',
             'domanda' => 'lore',
             'risposta' => 'lore',               
             'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s")],
        ]);

        DB::table('utenti')->insert([
            ['UserId' => '1',
             'nome' => 'lore',
             'cognome' => 'lore',               
             'data_nascita' => date("Y-m-d H:i:s"),
             'genere' => 'maschio',
             'email' => 'lore@lore.it',
             'telefono' => '3980901389',
             'username' => 'lorelore',
             'password' => 'Njpwskf4',
             'role' => 'locatore',
             'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s")],
            
            ['UserId' => '2',
             'nome' => 'lario',
             'cognome' => 'lario',               
             'data_nascita' => date("Y-m-d H:i:s"),
             'genere' => 'maschio',
             'email' => 'lario@lario.it',
             'telefono' => '3182201389',
             'username' => 'lariolario',
             'password' => 'Njpwskf4',
             'role' => 'locatario',
             'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s")],
            
            ['UserId' => '3',
             'nome' => 'admin',
             'cognome' => 'admin',               
             'data_nascita' => date("Y-m-d H:i:s"),
             'genere' => 'maschio',
             'email' => 'admin@admin.it',
             'telefono' => '3280912439',
             'username' => 'adminadmin',
             'password' => 'Njpwskf4',
             'role' => 'locatore',
             'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s")],
        ]);
        
        DB::table('messaggi')->insert([
            ['ID' => '1',
             'IDmittente' => '2',
             'IDdestinatario' => '1', 
             'contenuto' => 'Salve vorrei sapere di più sull annuncio', 
             'IDannuncio' => '1', 
             'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s")],
            
            ['ID' => '2',
             'IDmittente' => '1',
             'IDdestinatario' => '2', 
             'contenuto' => 'L annuncio riguarda l appartamento', 
             'IDannuncio' => '1', 
             'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s")],
            
            ['ID' => '3',
             'IDmittente' => '2',
             'IDdestinatario' => '1', 
             'contenuto' => 'Salve vorrei sapere di più sull annuncio', 
             'IDannuncio' => '2', 
             'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s")],
            
            ['ID' => '4',
             'IDmittente' => '1',
             'IDdestinatario' => '2', 
             'contenuto' => 'L annuncio riguarda la camera', 
             'IDannuncio' => '2', 
             'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s")],
        ]);
    }

}
