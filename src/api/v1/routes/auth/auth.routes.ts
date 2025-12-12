import { Router } from "express";
import type { Request, Response } from "express";


const router = Router();

// Exemple de route GET
router.get(`/`, (req: Request, res: Response) => { // ne pas oublier les middleware
    res.status(200).json({ message: "Auth route is working!" });
});


export default router;
