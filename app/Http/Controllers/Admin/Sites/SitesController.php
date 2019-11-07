<?php

namespace App\Http\Controllers\Admin\Sites;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sites\ShowSitesRequest;
use App\Http\Requests\Sites\StoreSiteRequest;
use App\Http\Requests\Sites\UpdateSiteRequest;
use App\Models\Sites;
use App\Repositories\AdminSitesRepository;
use Illuminate\Http\Request;


class SitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AdminSitesRepository $adminSiteRepository)
    {
        $sites = $adminSiteRepository->getList(2);
        if(empty($sites)){
            return view('sites');
        } else {
            return view('sites', compact('sites'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sites.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSiteRequest $request)
    {
        $fillable = $request->validated();
        $result = (new AdminSitesRepository())->store($fillable);

        if($result) {
            flash('Запись добавлена')->success();
            return redirect()
                ->route('admin.sites.index');
        } else {
            return back()
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ShowSitesRequest $request, AdminSitesRepository $adminSiteRepository)
    {
        $site = $adminSiteRepository->show($request);
        return view('admin.sites.show', compact('site'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ShowSitesRequest $request, AdminSitesRepository $adminSitesRepository)
    {
        $site = $adminSitesRepository->show($request);
        return view('admin.sites.edit', compact('site'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSiteRequest $request, AdminSitesRepository $adminSitesRepository)
    {
        $id = $request->site;
        $fillable = $request->validated();
        $result = $adminSitesRepository->update($fillable, $id);
        if (!$result) {
            return back()->withInput($fillable);
        } else {
            flash('Запись обновлена')->success();
            return redirect()->route('admin.sites.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, AdminSitesRepository $adminSitesRepository)
    {
        dd(__METHOD__);
        $result = $adminSitesRepository->destroy($id);
        if(!$result){
            return back()
                ->withInput();
        } else {
            flash('Сайт удален из списка мониторинга')->success();
            return redirect()->route('admin.sites.index');
        }
    }
}
