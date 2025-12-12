

export class AuthUser {
    private exist : boolean;
    private error : boolean;
    private errorMessage : string;

    constructor(_exist : boolean, _error : boolean = false, _errorMessage : string = "") {
        this.exist = _exist;
        this.error = _error;
        this.errorMessage = _errorMessage;
    }


    /**
     * getExist
     */
    public getExist() : boolean {
        return this.exist;
    }


    /**
     * getError
     */
    public getError() : boolean {
        return this.error;
    }


    /**
     * getErrorMessage
     */
    public getErrorMessage() : string {
        return this.errorMessage;
    }

}