<?php
class UploadException extends Exception {
	//Notar que solo el primer parámetro es obligatorio
	public function __construct(string $message = "", int $code = 0, Throwable $previous = null) {
		parent::__construct($message, $code, $previous);
	}
}