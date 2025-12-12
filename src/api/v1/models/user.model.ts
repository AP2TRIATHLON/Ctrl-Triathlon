

export class User {
    private username : string;
    private email : string;
    private age : number;

    constructor(_username : string, _email : string, _age : number ) {
        this.username = _username;
        this.email = _email;
        this.age = _age;
    }

    /**
     * getUsername
     */
    public getUsername() : string {
        return this.username;
    }

    /**
     * getEmail
     */
    public getEmail() : string {
        return this.email;
    }

    /**
     * getAge
     */
    public getAge() : number {
        return this.age;
    }

}