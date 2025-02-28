<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\LoginInfo;

use App\Http\Controllers\Controller;
use App\Repository\UserLoginInfoRepositoryInterface;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class LoginInfoController extends Controller
{
    public function __construct(private readonly UserLoginInfoRepositoryInterface $loginInfoRepository)
    {

    }
    public function index(): View|Application|Factory
    {
        return view('admin.login-info.index');
    }

    public function getLoginInfo(Request $request): JsonResponse
    {
        $pageNumber = ( $request->start / $request->length )+1;
        $pageLength = $request->length;
        $skip       = ($pageNumber-1) * $pageLength;

        $query = $this->loginInfoRepository->getLoginInfoWithUser();
        $search = $request->search;
        if ($search) {
            $query = $query->where(function($query) use ($search){
                $query->orWhere('ip_address', 'like', "%".$search."%");
                $query->orWhere('browser', 'like', "%".$search."%");
                $query->orWhere('login_date', 'like', "%".$search."%");
                $query->orWhereRelation('user', 'name', 'like', "%".$search."%");
                $query->orWhereRelation('user', 'email', 'like', "%".$search."%");
            });

        }

        $recordsFiltered = $recordsTotal = $query->count();
        $users = $query->skip($skip)->take($pageLength)->get();

        return response()->json(["draw"=> $request->draw, "recordsTotal"=> $recordsTotal, "recordsFiltered" => $recordsFiltered, 'data' => $users], 200);
    }
}
