
class Logger {
    
    static info(message : string) : void {
        console.log("[INFO] " + message);
    }


    static succes(message : string) : void {
        console.log("[SUCCES] " + message);
    }


    static warning(message : string) : void {
        console.log("[WARNING] " + message);
    }


    static error(message : string) : void {
        console.log("[ERROR] " + message);
    }
}


export default Logger;