import { AuthUser } from "../models/auth";



export async function getIfExist() : Promise<AuthUser> {
    
    return new AuthUser(true);
}


