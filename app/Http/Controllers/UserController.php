<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\MessageBag;

use Validator;

class UserController extends Controller {
	public function getLogin() {
		return view('auth.login');
	}
	public function postLogin(Request $request) {
		$rules = [
			'username' => 'required',
			'password' => 'required|min:4'
		];
		$messages = [
			'username.required' => 'Vui lòng nhập tài khoản !',
			'password.required' => 'Vui lòng nhập mật khẩu !',
			'password.min'      => 'Mật khẩu phải từ 4 ký tự trở lên !'
		];
		$validator = Validator::make($request->all(), $rules, $messages);
		if ($validator    ->fails()) {
			return redirect()->back()->withErrors($validator)->withInput();
		} else {
			$login       = (file_get_contents(__DIR__ ."/../../../storage/account/account.json"));
			$login_array = json_decode($login, true);
			$check       = false;
			$size_array  = sizeof($login_array);
			for ($i = 0; $i < $size_array; $i++) {
				if ($request->username == $login_array[$i]['Accont'] && md5($request->password) == $login_array[$i]['Password']) {
					$check = true;
					return view('admin.master');
				}
			}
			if (!$check) {
				$errors = new MessageBag(['errorslogin' => 'Tài Khoản Hoặc mật khẩu không đúng !']);
				return redirect()->back()->withInput()->withErrors($errors);
			}
		}
	}

	public function getpassworld() {
		return view('auth.password');
	}

	public function getposts() {
		return view('admin.container');
	}

	public function getlogo() {
		return view('admin.logo');
	}

	public function postlogo(Request $request) {
		$logoArr = array();
		foreach ($request->all() as $key => $value) {
			if ($key == 'upload') {
				if ($request->hasFile('files')) {
					$file             = $request->file('files');
					$check            = $file->move('public/tunhien/images', $file->getClientOriginalName());
					$logoArr['Image'] = $file->getClientOriginalName();
					$logojson         = json_encode($logoArr);
					if ($check) {
						file_put_contents(__DIR__ ."/../../../storage/jsonLogo/logo.json", $logojson);
						return view('admin.logo');
					} else {

						return view('admin.logo');
					}
				} else {
					return view('admin.logo');
				}
			} elseif ($key == "delete") {

				$logoArr['Image'] = "";
				$logojson         = json_encode($logoArr);
				file_put_contents(__DIR__ ."/../../../storage/jsonLogo/logo.json", $logojson);
				return view('admin.logo');

			} elseif ($key == 'uploadsologan') {
				if ($request->hasFile('filesologan')) {
					$file                = $request->file('filesologan');
					$checksologan        = $file->move('public/tunhien', $file->getClientOriginalName());
					$sologanArr['Image'] = $file->getClientOriginalName();
					$sologanjson         = json_encode($sologanArr);
					if ($checksologan) {
						file_put_contents(__DIR__ ."/../../../storage/jsonLogo/sologan.json", $sologanjson);
						return view('admin.logo');
					} else {

						return view('admin.logo');
					}
				} else {
					return view('admin.logo');
				}
			} elseif ($key == 'deletesologan') {
				$sologanArr['Image'] = "";
				$sologanjson         = json_encode($sologanArr);
				file_put_contents(__DIR__ ."/../../../storage/jsonLogo/sologan.json", $sologanjson);
				return view('admin.logo');
			}
		}
	}

	public function getmenu() {
		return view('admin.menuheader');
	}

	public function postmenu(Request $request) {
		$data = $request->all();
		foreach ($data as $key => $value) {
			$a       = file_get_contents(storage_path()."/jsonmenu/menu.json");
			$menuArr = json_decode($a, true);
			if ($key == 'submitadd') {
				if (empty($menuArr)) {
					$a = 0;
				} else {
					foreach ($menuArr as $key => $value) {
						$a = $key+1;
					}
				}
				$menuArr[] =
				[
					'ID'       => $a,
					'NameMenu' => $data["addnamemenu"],
					'LinkMenu' => $data["addlinkmenu"]
				];
				$menujson = json_encode($menuArr);
				file_put_contents(storage_path()."/jsonmenu/menu.json", $menujson);
				return view('admin.menuheader');
			} elseif ($key == 'submitedit') {
				$data    = $request->all();
				$a       = file_get_contents(storage_path()."/jsonmenu/menu.json");
				$menuArr = json_decode($a, true);
				foreach ($menuArr as $key => $value) {
					if ($value['ID'] == $data['idmenu']) {
						$menuArr[$key] = [
							'ID'       => $value['ID'],
							'NameMenu' => $data["editnamemenu"],
							'LinkMenu' => $data["editlinkmenu"]
						];
						$menujson = json_encode($menuArr);
						file_put_contents(storage_path()."/jsonmenu/menu.json", $menujson);
						return view('admin.menuheader');
					}
				}
			}
		}
	}

	public function getidmenus($id, Request $request) {
		$Logoslidesdt = file_get_contents(storage_path()."/jsonmenu/menu.json", true);
		$Logoslidesdt = json_decode($Logoslidesdt, true);
		$record       = array_search($id, array_column($Logoslidesdt, 'ID'));
		return response()->json([
				'error' => false,
				'data'  => $Logoslidesdt[$record]
			]);
	}
	public function getidmenusdelete(Request $request) {
		$data    = $request->all();
		$a       = file_get_contents(storage_path()."/jsonmenu/menu.json");
		$menuArr = json_decode($a, true);
		$id      = $request->id;
		echo $id;
		foreach ($menuArr as $key => $value) {
			if ($key == $id) {
				unset($menuArr[$key]);
				$menujson = json_encode($menuArr);
				file_put_contents(storage_path()."/jsonmenu/menu.json", $menujson);
				// return view('admin.menuheader');

			}
		}
		$a       = file_get_contents(storage_path()."/jsonmenu/menu.json");
		$menuArr = json_decode($a, true);
		if (!empty($menuArr)) {
			$number           = 0;
			$temporaryStorage = array();
			foreach ($menuArr as $key => $value) {
				$menuArr[$key]['ID'] = $number;
				$number++;
				$temporaryStorage[] =
				[
					'ID'       => $menuArr[$key]['ID'],
					'NameMenu' => $menuArr[$key]['NameMenu'],
					'LinkMenu' => $menuArr[$key]['LinkMenu']
				];

			}
			$menuArr = array();
			foreach ($temporaryStorage as $key => $value) {
				$menuArr[] =
				[
					'ID'       => $temporaryStorage[$key]['ID'],
					'NameMenu' => $temporaryStorage[$key]['NameMenu'],
					'LinkMenu' => $temporaryStorage[$key]['LinkMenu']
				];
			}
			$menujson = json_encode($menuArr);
			file_put_contents(storage_path()."/jsonmenu/menu.json", $menujson);
			return redirect()->route('menuheader');
		} else {
			return redirect()->route('menuheader');
		}
	}

	public function getsocialheader() {
		return view('admin.socialheader');
	}

	public function postsocialheader(Request $request) {
		$data = $request->all();
		foreach ($data as $key => $value) {
			$a         = file_get_contents(storage_path()."/jsonSocial/socialheader.json");
			$socialArr = json_decode($a, true);
			if ($key == 'submitadd') {
				if (empty($socialArr)) {
					$a = 0;
				} else {
					foreach ($socialArr as $key => $value) {
						$a = $key+1;
					}
				}
				$socialArr[] =
				[
					'ID'         => $a,
					'NameSocial' => $data["selectsocial"],
					'LinkSocial' => $data["addlinksocial"]
				];
				$socialjson = json_encode($socialArr);
				file_put_contents(storage_path()."/jsonSocial/socialheader.json", $socialjson);
				return view('admin.socialheader');
			} elseif ($key == 'submitedit') {
				$data      = $request->all();
				$a         = file_get_contents(storage_path()."/jsonSocial/socialheader.json");
				$socialArr = json_decode($a, true);

				foreach ($socialArr as $key => $value) {
					if ($value['ID'] == $data['idsocial']) {
						$socialArr[$value['ID']] = [
							'ID'         => $value['ID'],
							'NameSocial' => $data["editselect"],
							'LinkSocial' => $data["editlinksocial"]
						];
						$socialjson = json_encode($socialArr);
						file_put_contents(storage_path()."/jsonSocial/socialheader.json", $socialjson);
						return view('admin.socialheader');
					}
				}
			}
		}
	}

	public function getidsocial($id, Request $request) {
		$Logoslidesdt = file_get_contents(storage_path()."/jsonSocial/socialheader.json", true);
		$Logoslidesdt = json_decode($Logoslidesdt, true);
		$record       = array_search($id, array_column($Logoslidesdt, 'ID'));
		return response()->json([
				'error' => false,
				'data'  => $Logoslidesdt[$record]
			]);
	}

	public function getidsocialdelete(Request $request) {
		$data      = $request->all();
		$a         = file_get_contents(storage_path()."/jsonSocial/socialheader.json");
		$socialArr = json_decode($a, true);
		$id        = $request->id;
		foreach ($socialArr as $key => $value) {
			if ($key == $id) {
				unset($socialArr[$key]);
				$socialjson = json_encode($socialArr);
				file_put_contents(storage_path()."/jsonSocial/socialheader.json", $socialjson);
			}
		}
		$a         = file_get_contents(storage_path()."/jsonSocial/socialheader.json");
		$socialArr = json_decode($a, true);
		if (!empty($socialArr)) {
			$number           = 0;
			$temporaryStorage = array();
			foreach ($socialArr as $key => $value) {
				$socialArr[$key]['ID'] = $number;
				$number++;
				$temporaryStorage[] =
				[
					'ID'         => $socialArr[$key]['ID'],
					'NameSocial' => $socialArr[$key]['NameSocial'],
					'LinkSocial' => $socialArr[$key]['LinkSocial']
				];

			}
			$socialArr = array();
			foreach ($temporaryStorage as $key => $value) {
				$socialArr[] =
				[
					'ID'         => $temporaryStorage[$key]['ID'],
					'NameSocial' => $temporaryStorage[$key]['NameSocial'],
					'LinkSocial' => $temporaryStorage[$key]['LinkSocial']
				];
			}
			$socialjson = json_encode($socialArr);
			file_put_contents(storage_path()."/jsonSocial/socialheader.json", $socialjson);
			return redirect()->route('socialheader');
		} else {
			return redirect()->route('socialheader');
		}
	}

	public function getslideshow() {
		return view('admin.slideshow');
	}

	public function getabout() {
		return view('admin.about');
	}

	public function getidabout($id, Request $request) {
		$idabout = file_get_contents(storage_path()."/jsonabout/about.json", true);
		$idabout = json_decode($idabout, true);
		$record  = array_search($id, array_column($idabout, 'ID'));
		return response()->json([
				'error' => false,
				'data'  => $idabout[$record]
			]);
	}

	public function postabout(Request $request) {
		$data = $request->all();
		foreach ($data as $key => $value) {
			$a        = file_get_contents(storage_path()."/jsonabout/about.json");
			$aboutArr = json_decode($a, true);
			if ($key == 'submitadd') {
				if (empty($aboutArr)) {
					$a = 0;
					$b = 0;
				} else {
					foreach ($aboutArr as $key => $value) {
						$a = $key+1;
					}
					$b = count($aboutArr);
				}
				if ($b >= 4) {
					echo "<script>alert('Only Added Maximum 4 Item About !!!');</script>";
					return view('admin.about');
				} else {
					$aboutArr[] =
					[
						'ID'       => $a,
						'NameIcon' => $data["selecticonabout"],
						'TitleTop' => $data["addtitletop"],
						'TitleBot' => $data["addtitlebot"],
						'Text'     => $data["addtext"],
						'Link'     => $data["addlink"]
					];
					$aboutjson = json_encode($aboutArr);
					file_put_contents(storage_path()."/jsonabout/about.json", $aboutjson);
					return view('admin.about');}
			} elseif ($key == 'submitedit') {
				$data     = $request->all();
				$a        = file_get_contents(storage_path()."/jsonabout/about.json");
				$aboutArr = json_decode($a, true);

				foreach ($aboutArr as $key => $value) {
					if ($value['ID'] == $data['idabout']) {
						$aboutArr[$value['ID']] = [
							'ID'       => $value['ID'],
							'NameIcon' => $data["selecticonabout"],
							'TitleTop' => $data["edittitletop"],
							'TitleBot' => $data["edittitlebot"],
							'Text'     => $data["edittext"],
							'Link'     => $data["editlink"]
						];
						$aboutjson = json_encode($aboutArr);
						file_put_contents(storage_path()."/jsonabout/about.json", $aboutjson);
						return view('admin.about');
					}
				}

			}
		}

	}

	public function getidaboutdelete(Request $request) {
		$data     = $request->all();
		$a        = file_get_contents(storage_path()."/jsonabout/about.json");
		$aboutArr = json_decode($a, true);
		$id       = $request->id;
		foreach ($aboutArr as $key => $value) {
			if ($key == $id) {
				unset($aboutArr[$key]);
				$aboutjson = json_encode($aboutArr);
				file_put_contents(storage_path()."/jsonabout/about.json", $aboutjson);
			}
		}
		$a        = file_get_contents(storage_path()."/jsonabout/about.json");
		$aboutArr = json_decode($a, true);

		if (!empty($aboutArr)) {
			$number           = 0;
			$temporaryStorage = array();
			foreach ($aboutArr as $key => $value) {
				$aboutArr[$key]['ID'] = $number;
				$number++;
				$temporaryStorage[] =
				[

					'ID'       => $aboutArr[$key]['ID'],
					'NameIcon' => $aboutArr[$key]["NameIcon"],
					'TitleTop' => $aboutArr[$key]["TitleTop"],
					'TitleBot' => $aboutArr[$key]["TitleBot"],
					'Text'     => $aboutArr[$key]["Text"],
					'Link'     => $aboutArr[$key]["Link"]
				];

			}

			$aboutArr = array();
			foreach ($temporaryStorage as $key => $value) {
				$aboutArr[] =
				[

					'ID'       => $temporaryStorage[$key]['ID'],
					'NameIcon' => $temporaryStorage[$key]["NameIcon"],
					'TitleTop' => $temporaryStorage[$key]["TitleTop"],
					'TitleBot' => $temporaryStorage[$key]["TitleBot"],
					'Text'     => $temporaryStorage[$key]["Text"],
					'Link'     => $temporaryStorage[$key]["Link"]
				];
			}

			$aboutjson = json_encode($aboutArr);
			file_put_contents(storage_path()."/jsonabout/about.json", $aboutjson);
			return redirect()->route('about');
		} else {
			return redirect()->route('about');
		}
	}

	public function postslideshow(Request $request) {
		$data = $request->all();
		foreach ($data as $key => $value) {
			if ($key == 'submitadd') {
				if ($request->hasFile('files')) {
					$file         = $request->file('files');
					$a            = file_get_contents(storage_path()."/jsonSlideshow/slideshow.json");
					$slideshowArr = json_decode($a, true);
					if (empty($slideshowArr)) {
						$id = 0;
					} else {
						foreach ($slideshowArr as $key => $value) {
							$id = $key+1;
						}
					}
					$nameImage      = $file->getClientOriginalName();
					$slideshowArr[] =
					[
						'ID'        => $id,
						'NameImage' => $nameImage

					];
					$check         = $file->move('public/tunhien/images', $file->getClientOriginalName());
					$slideshowjson = json_encode($slideshowArr);
					if ($check) {
						file_put_contents(storage_path()."/jsonSlideshow/slideshow.json", $slideshowjson);
						return view('admin.slideshow');
					} else {

						return view('admin.slideshow');
					}
				} else {
					return view('admin.slideshow');
				}
			}
		}
	}

	public function getidslideshowdelete(Request $request) {
		$data         = $request->all();
		$id           = $data['id'];
		$a            = file_get_contents(storage_path()."/jsonSlideshow/slideshow.json");
		$slideshowArr = json_decode($a, true);
		foreach ($slideshowArr as $key => $value) {
			if ($key == $id) {
				unset($slideshowArr[$key]);
				$slideshowjson = json_encode($slideshowArr);
				file_put_contents(storage_path()."/jsonSlideshow/slideshow.json", $slideshowjson);
			}
		}
		$a            = file_get_contents(storage_path()."/jsonSlideshow/slideshow.json");
		$slideshowArr = json_decode($a, true);

		if (!empty($slideshowArr)) {
			$number           = 0;
			$temporaryStorage = array();
			foreach ($slideshowArr as $key => $value) {
				$slideshowArr[$key]['ID'] = $number;
				$number++;
				$temporaryStorage[] =
				[

					'ID'        => $slideshowArr[$key]['ID'],
					'NameImage' => $slideshowArr[$key]["NameImage"]
				];

			}

			$slideshowArr = array();
			foreach ($temporaryStorage as $key => $value) {
				$slideshowArr[] =
				[

					'ID'        => $temporaryStorage[$key]['ID'],
					'NameImage' => $temporaryStorage[$key]["NameImage"]
				];
			}

			$slideshowjson = json_encode($slideshowArr);
			file_put_contents(storage_path()."/jsonSlideshow/slideshow.json", $slideshowjson);
			return redirect()->route('slideshow');
		} else {
			return redirect()->route('slideshow');
		}
	}

}
