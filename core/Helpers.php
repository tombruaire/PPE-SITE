<?php

class Helpers {

	public function input($type, $name, $id, $placeholder) {
		return "
		<div class='mb-3'>
            <input type='{$type}' name='{$name}' id='{$id}' placeholder='{$placeholder}' class='form-control form-control-lg bg-primary text-light'>
        </div>
		";
	}

	public function password($function, $name, $id, $placeholder) {
		return "
		<div class='input-group mb-3'>
            <span class='input-group-text bg-primary'>
                <div class='row'>
                    <div class='col-1'>
                        <input type='checkbox' name='checkbox' onclick='{$function}' class='form-check-input fs-4 align-self-center bg-dark'>
                    </div>
                </div>
            </span>
            <input type='password' name='{$name}' id='{$id}' placeholder='{$placeholder}' class='form-control form-control-lg bg-primary text-light'>
        </div>
		";
	}

	public function checkbox($type, $name, $id, $texte) {
		return "
		<div class='mb-3 form-check' style='cursor: pointer;'>
            <input type='{$type}' name='{$name}' id='{$id}' class='form-check-input fs-4 bg-dark' style='cursor: pointer;'>
            <label for='{$id}' class='form-check-label fs-5 text-light align-middle' style='cursor: pointer;'>{$texte}</label>
        </div>
		";
	}

	public function button($type, $name, $class, $color, $texte) {
		return "<button type='{$type}' name='{$name}' class='btn btn-lg btn-{$class} fw-bold text-{$color} active'>{$texte}</button>";
	}

	public function textarea($name, $id, $placeholder) {
		return "<textarea name='{$name}' id='{$id}' placeholder'{$placeholder}' class='form-control form-control-lg bg-primary text-light' rows='6'></textarea>";
	}

	public function label($id, $class, $texte) {
		return "<label for='{$id}' class='form-label text-{$class} text-lg'>{$texte}</label>";
	}

	public function select($id, $name, $options = array()) {
		$html = "<select id='{$id}' name='{$name}' class='form-select form-control-lg'>";
		foreach ($options as $key => $value) {
			$html .= "<option value='{$key}'>{$value}</option>";
		}
		$html .= "</select>";
		return $html;
	}

	public function lien($pageUrl, $pageName) {
		return "
		<li class='nav-item'>
			<a class='nav-link text-lg px-lg-3' href='{$pageUrl}'>
				{$pageName}
			</a>
		</li>
		";
	}

	public function footer() {
		return "
		<footer class='mt-auto d-flex text-center text-light fw-bold justify-content-center'>
			<div class='card' style='background-color: transparent; border: 1px solid #fff;'>
				<div class='card-body bg-secondary'>
					Copyright &copy; 2021 - mairievilliers
				</div>
			</div>
		</footer>
		";
	}

	public function authButton($pageUrl, $pageName, $color, $class) {
		return "
		<a class='btn btn-{$color} my-2 my-sm-0 {$class}' href='{$pageUrl}'>
        	{$pageName}
        </a>
		";
	}

	public function dropdownItem($pageUrl, $pageName) {
		return "
		<a class='dropdown-item' href='{$pageUrl}'>
			{$pageName}
		</a>
		";
	}

	public function pseudo($pseudo) {
		return "
		<a class='nav-link d-none d-sm-inline-block bg-primary' href='#' data-bs-toggle='dropdown'>
			<i class='align-middle me-1 text-light' data-feather='user'></i>
        	<span class='text-light fw-bold'>
        		{$pseudo}
        	</span>
      	</a>
		";
	}

	public function userIcon() {
		return "
		<a class='nav-icon d-inline-block d-sm-none btn btn-primary active' href='profil'>
			<svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='currentColor' class='bi bi-person-circle text-light' viewBox='0 0 16 16'>
			  <path d='M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z'/>
			  <path fill-rule='evenodd' d='M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z'/>
			</svg>
		</a>
		";
	}

	public function logout() {
		return "
		<a class='nav-link d-inline-block d-sm-none btn btn-danger active' href='deconnexion'>
			Déconnexion
		</a>
		";
	}
}

?>
