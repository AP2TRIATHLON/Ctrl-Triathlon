import { User } from "../models/user.model";



export async function getUser() : Promise<User> {
    
    return new User("", "", 0);
}
