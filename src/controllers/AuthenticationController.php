<?php
require_once UTILS_PATH;
require_once SERVICES_DIR . "AuthenticationService.php";
require_once ERRORS_DIR . "DBError.php";
require_once ERRORS_DIR . "NotFoundError.php";
require_once ERRORS_DIR . "ValidationError.php";
class AuthenticationController extends BaseController {
    public function __construct(Request $request) {
        parent::__construct($request, [
            [
                'pattern' => '/^\/api\/auth\/signup\/?$/',
                'methods' => ['POST'],
                'action' => 'signup'
            ],
            [
                'pattern' => '/^\/api\/auth\/signin\/?$/',
                'methods' => ['POST'],
                'action' => 'signin'
            ]
        ]);
    }

    public function signup($args)
    {
        try {
            $user = AuthenticationService::signup(array_merge(
                $this->request->body,
                ['image' => $this->request->files['image']]
            ));
            return new SuccessCreationResponse(["user" => $user]);
        } catch (DBError $e) {
            return new BadRequestErrorResponse("DBError", $e->getMessage(), $e->getCode());
        } catch (PDOException $e) {
            return new IternalErrorResponse("PDOException", $e->getMessage(), $e->getCode());
        } catch (Exception $e) {
            return new IternalErrorResponse("Internal Error", $e->getMessage(), $e->getCode());
        }
    }

    public function signin($args)
    {
        try {
            $user = AuthenticationService::signin($this->request->body['username'], $this->request->body['password']);
            return new SuccessResponse(["user" => $user]);
        } catch (NotFoundError $e) {
            return new NotFoundErrorResponse($e->getMessage(), $e->getCode());
        } catch (ValidationError $e) {
            return new BadRequestErrorResponse("Validation Error", $e->getMessage(), $e->getCode());
        } catch (PDOException $e) {
            return new IternalErrorResponse("PDOException", $e->getMessage(), $e->getCode());
        } catch (Exception $e) {
            return new IternalErrorResponse("InternalError", $e->getMessage(), $e->getCode());
        }
    }
}