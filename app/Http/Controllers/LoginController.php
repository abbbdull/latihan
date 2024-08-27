<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;

class LoginController extends Controller
{
    private $apiUrl = 'localhost/latihan6/api/register/proses';
    public function index()
    {
        return view('auth.login');
    }

    public function register(Request $request)
    {
        $response = Http::post("{$this->apiUrl}", $request->all());
        $produk = $response->json();
        return redirect()->back()->with('message', 'Registrasi berhasil! Silakan login.');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $client = new Client();
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        try {
            $response = $client->post('http://localhost/latihan6/api/login_proses', [
                'json' => $data,
            ]);

            $responseBody = json_decode($response->getBody(), true);

            if (isset($responseBody['token'])) {
                session([
                    'api_token' => $responseBody['token'],
                    'id' => $responseBody['user']['id'],
                    'name' => $responseBody['user']['name'],
                    'email' => $responseBody['user']['email'],
                    'id_role' => $responseBody['user']['id_role'],
                ]);

                return redirect()->route('cart')->with('success', 'Berhasil Masuk!');
            } else {
                return redirect()->back()->withErrors(['error' => 'Login gagal, periksa kembali email dan password Anda.']);
            }
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseBody = json_decode($response->getBody(), true);
            return redirect()->back()->withErrors(['error' => $responseBody['message']]);
        }
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
