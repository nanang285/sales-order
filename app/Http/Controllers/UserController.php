<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return response()->json(['success' => true, 'message' => 'Suceess, Daftar user berhasil diambil', 'data' => $users], 200);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:50',
                'email' => 'required|string|email|max:50|unique:users,email',
                'password' => 'required|string|min:8',
                'role' => 'required|string|in:admin,tester',
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);

            return response()->json(
                [
                    'message' => 'Succes, User berhasil dibuat',
                    'data' => $user,
                ],
                201,
            );
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(
                [
                    'message' => 'Error, Validasi gagal',
                    'errors' => $e->errors(),
                ],
                422,
            );
        } catch (\Exception $e) {
            return response()->json(
                [
                    'message' => 'Error, Terjadi kesalahan pada server',
                ],
                500,
            );
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
            'role' => 'required|string|in:admin,tester',
        ]);

        $user = User::find($id);

        if (!$user) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Error, User tidak ditemukan',
                ],
                404,
            );
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        if ($request->filled('password')) {
            $user->update(['password' => Hash::make($request->password)]);
        }

        return response()->json(
            [
                'success' => true,
                'message' => 'Success, User berhasil diperbarui',
                'data' => $user,
            ],
            200,
        );
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Error, User tidak ditemukan',
                ],
                404,
            );
        }

        try {
            $user->delete();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Success, User berhasil dihapus',
                ],
                200,
            );
        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => ' Error, Terjadi kesalahan saat menghapus user',
                    'error' => $e->getMessage(),
                ],
                500,
            );
        }
    }
}
