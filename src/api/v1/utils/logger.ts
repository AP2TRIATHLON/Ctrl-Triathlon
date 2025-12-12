const chalk = require('chalk');

class Logger {
    
    static info(message : string) : void {
        console.log(chalk.blue("[INFO] " + message));
    }


    static succes(message : string) : void {
        console.log(chalk.green("[SUCCES] " + message));
    }


    static warning(message : string) : void {
        console.log(chalk.yellow("[WARNING] " + message));
    }


    static error(message : string) : void {
        console.log(chalk.red("[ERROR] " + message));
    }


    static debug(message : string) : void {
        console.log(chalk.magenta("[DEBUG] " + message));
    }
}


export default Logger;