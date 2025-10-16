import { StrictMode } from "react";
import { createRoot } from "react-dom/client";
import "@css/style.css";
import QuotePage from "./assets/pages/quotes/quotes";


createRoot(document.getElementById("root")).render(
  <StrictMode>
    <QuotePage/>
  </StrictMode>,
);