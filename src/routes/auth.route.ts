import { Router } from "express";
import type { Request, Response } from "express";


const router = Router();

// Exemple de route GET
router.get("/auth", (req: Request, res: Response) => {
    res.json({ message: "Profil utilisateur" });
});


export default router;
