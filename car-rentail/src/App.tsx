import { Routes, Route, BrowserRouter } from "react-router-dom"
import Dashboard from "./views/Dashboard"
import Contact from "./views/Contact"

function App() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<Dashboard />} />
        <Route path="/contact" element={<Contact />} />
      </Routes>
    </BrowserRouter>
  )
}

export default App
