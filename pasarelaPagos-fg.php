<?php
        // SDK do MercadoPago
        use MercadoPagoMercadoPagoConfig;
        //Adicione as credenciais
        MercadoPagoConfig::setAccessToken("TEST-2681096437463095-110920-b1a51aae1fab850305e5feb577cc13ce-145053531");

          // Cria um objeto de preferência
          $client = new PreferenceClient();
          $preference = $client->create([
            "items"=> array(
              array(
                "id" => 'item-ID-1234',
                "title" => 'Meu produto',
                "currency_id" => 'BRL',
                "picture_url" => 'https://www.mercadopago.com/org-img/MP3/home/logomp3.gif',
                "description" => 'Descrição do Item',
                "category_id" => 'art',
                "quantity" => 1,
                "unit_price" => 75.76
              )
            ),
              "payer"=> array(
                "name" => 'João',
                "surname" => 'Silva',
                "email" => 'user@email.com',
                "phone" => array(
                  'area_code' => '11',
                  'number' => '4444-4444'
                ),
                "identification" => array(
                  "type" => 'CPF',
                  "number" => '19119119100'
                ),
                "address" => array(
                  "street_name" => 'Street',
                  "street_number" => 123,
                  "zip_code" => '06233200'
                )
              ),
              "back_urls"=> array(
                "success" => 'https://www.success.com',
                "failure" => 'http://www.failure.com',
                "pending" => 'http://www.pending.com'
              ),
        
              "notification_url" => 'https://www.your-site.com/ipn',
              "statement_descriptor" => 'MEUNEGOCIO',
              "external_reference" => 'Reference_1234',
              "expires" => true,
              "expiration_date_from" => '2016-02-01T12:00:00.000-04:00',
              "expiration_date_to" => '2016-02-28T12:00:00.000-04:00',
              ),
          ]);
    ?>

<div id="wallet_container">
    </div>
    <script>
      const mp = new MercadoPago('TEST-d3a4ae28-6b6a-4d15-b2a9-f6d9a756dec7', {
        locale: 'es-AR'
      });

      mp.bricks().create("wallet", "wallet_container", {
        initialization: {
            preferenceId: "<PREFERENCE_ID>",
        },
      });
  </script>