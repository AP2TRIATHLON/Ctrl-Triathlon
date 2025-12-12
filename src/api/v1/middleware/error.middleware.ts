import type { NextFunction, Request, Response } from "express";
import Logger from "../utils/logger";


export const errorHandler = (err : Error, req : Request, res : Response, next : NextFunction) => {
    Logger.error(err.message);
    
    res.status(500).json({ error: "Erreur interne" });
};
