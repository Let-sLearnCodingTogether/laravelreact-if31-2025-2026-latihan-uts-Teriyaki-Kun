import http from "@api/apiClient";
import Button from "../../../components/ui/button";
import Input from "../../../components/ui/input";
import { useId, useState } from "react";

export default function createQuotes() {
    // State untuk menyimpan status loading
    const [isLoading, setIsLoading] = useState(false);
    
    // State untuk menyimpan data form
    const [form, setForm] = useState({
        quote: "",
        author: "",
        year: "",
        category: "",
        source: ""
    });

    return (
        <div>
            {/* JSX untuk tampilan form akan datang ke sini */}
        </div>
    )
}