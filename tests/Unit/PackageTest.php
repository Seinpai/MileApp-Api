<?php

namespace Tests\Unit;

use App\Package;
use Tests\TestCase;

class PackageTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCanCreateNewPackage()
    {
        $payload = [
            "transaction_id" => "d0090c40-539f-479a-8274-899b9970bddc",
            "customer_name" => "PT. AMARA PRIMATIGA 99",
            "customer_code" => "99999999",
            "organization_id" => "6",
            "transaction_code" => "CGKFT20200715121",
            "what_company_does" => "Video-sharing platform",
            "customer_attribute" => array(
                "Nama_Sales" => "Raditya Dika",
                "TOP" => "14 Hari",
                "Jenis_Pelanggan" => "B2B"
            ),
            "connote_id" => "f70670b1-c3ef-4caf-bc4f-eefa702092ed",
            "origin_data" => array(
                "location_id" => "5cecb20b6c49615b174c3e74",
                "customer_name" => "PT. NARA OKA PRAKARSA",
                "customer_address" => "L. KH. AHMAD DAHLAN NO. 100, SEMARANG TENGAH 12420",
                "customer_email" => "info@naraoka.co.id",
                "customer_phone" => "024-1234567",
                "customer_address_detail" => "",
                "customer_zip_code" => "12420",
                "zone_code" => "CGKFT",
                "organization_id" => "6"
            ),
            "destination_data" => array(
                "location_id" => "5cecb20b6c49615b174c3e74",
                "customer_name" => "PT AMARIS HOTEL SIMPANG LIMA",
                "customer_address" => "JL. KH. AHMAD DAHLAN NO. 01, SEMARANG TENGAH",
                "customer_email" => "",
                "customer_phone" => "0248453499",
                "customer_address_detail" => "KOTA SEMARANG SEMARANG TENGAH KARANGKIDUL",
                "customer_zip_code" => "50241",
                "zone_code" => "SMG",
                "organization_id" => "6"
            ),
            'koli_data' =>
            array(
                array(
                    'koli_length' => 0,
                    'awb_url' => 'https://tracking.mile.app/label/AWB00100209082020.1',
                    'created_at' => '2020-07-15 11:11:13',
                    'koli_chargeable_weight' => 9,
                    'koli_width' => 0,
                    'koli_surcharge' =>
                    array(),
                    'koli_height' => 0,
                    'updated_at' => '2020-07-15 11:11:13',
                    'koli_description' => 'V WARP',
                    'koli_formula_id' => NULL,
                    'connote_id' => 'f70670b1-c3ef-4caf-bc4f-eefa702092ed',
                    'koli_volume' => 0,
                    'koli_weight' => 9,
                    'koli_id' => 'e2cb6d86-0bb9-409b-a1f0-389ed4f2df2d',
                    'koli_custom_field' =>
                    array(
                        'awb_sicepat' => NULL,
                        'harga_barang' => NULL,
                    ),
                    'koli_code' => 'AWB00100209082020.1',
                ),
                array(
                    'koli_length' => 0,
                    'awb_url' => 'https://tracking.mile.app/label/AWB00100209082020.2',
                    'created_at' => '2020-07-15 11:11:13',
                    'koli_chargeable_weight' => 9,
                    'koli_width' => 0,
                    'koli_surcharge' =>
                    array(),
                    'koli_height' => 0,
                    'updated_at' => '2020-07-15 11:11:13',
                    'koli_description' => 'V WARP',
                    'koli_formula_id' => NULL,
                    'connote_id' => 'f70670b1-c3ef-4caf-bc4f-eefa702092ed',
                    'koli_volume' => 0,
                    'koli_weight' => 9,
                    'koli_id' => '3600f10b-4144-4e58-a024-cc3178e7a709',
                    'koli_custom_field' =>
                    array(
                        'awb_sicepat' => NULL,
                        'harga_barang' => NULL,
                    ),
                    'koli_code' => 'AWB00100209082020.2',
                ),
                array(
                    'koli_length' => 0,
                    'awb_url' => 'https://tracking.mile.app/label/AWB00100209082020.3',
                    'created_at' => '2020-07-15 11:11:13',
                    'koli_chargeable_weight' => 2,
                    'koli_width' => 0,
                    'koli_surcharge' =>
                    array(),
                    'koli_height' => 0,
                    'updated_at' => '2020-07-15 11:11:13',
                    'koli_description' => 'LID HOT CUP',
                    'koli_formula_id' => NULL,
                    'connote_id' => 'f70670b1-c3ef-4caf-bc4f-eefa702092ed',
                    'koli_volume' => 0,
                    'koli_weight' => 2,
                    'koli_id' => '2937bdbf-315e-4c5e-b139-fd39a3dfd15f',
                    'koli_custom_field' =>
                    array(
                        'awb_sicepat' => NULL,
                        'harga_barang' => NULL,
                    ),
                    'koli_code' => 'AWB00100209082020.3',
                ),
            ),
        ];

        $this->postJson(route('package.store'), $payload, ['Accept' => 'application/json'])
            ->assertStatus(201)
            ->assertJson([
                "record" => [
                    "customer_name" => "PT. AMARA PRIMATIGA 99",
                    "customer_code" => "99999999",
                ],
                "message" => "Package created successfully."
            ]);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCanListAllPackages()
    {
        $this->get(route('package.index'))
            ->assertStatus(200)
            ->assertJson([
                "message" => "Packages retrieved successfully."
            ]);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCanDisplayPackage()
    {
        $package = Package::latest()->first();

        $this->get(route('package.show', $package->_id))
            ->assertStatus(200)
            ->assertJson([
                "record" => [
                    "customer_name" => "PT. AMARA PRIMATIGA 99",
                    "customer_code" => "99999999",
                ],
                "message" => "Package retrieved successfully."
            ]);
    }


    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCanUpdatePackage()
    {
        $payload = [
            "transaction_id" => "d0090c40-539f-479a-8274-899b9970bddc",
            "customer_name" => "PT. AMARA PRIMATIGA 66",
            "customer_code" => "66666666",
        ];

        $package = Package::latest()->first();

        $this->patchJson(route('package.update', $package->_id), $payload, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                "record" => [
                    "customer_name" => "PT. AMARA PRIMATIGA 66",
                    "customer_code" => "66666666",
                ],
                "message" => "Package updated successfully."
            ]);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCanDeletePackage()
    {

        $package = Package::latest()->first();

        $this->deleteJson(route('package.update', $package->_id), [], ['Accept' => 'application/json'])
            ->assertStatus(200);
    }
}
