import VehicleCard from "./VehicleCard"
import { useEffect, useState } from "react"
import axios from "axios"

export default function VehicleList() {
  const [vehicles, setVehicles] = useState<any[]>([])

  const getVehicle = async () => {
    try {
      const response = await axios.get(`${import.meta.env.VITE_API_URL}/cars`)

      setVehicles(response.data.data)
    } catch (error) {
      console.error(error)
    }
  }

  useEffect(() => {
    getVehicle()
  }, [])

  return (
    <div className="vehicles-panel p-4 h-100 flex-shrink-0 position-relative">
      <div
        className="d-flex justify-content-between align-items-center mb-4 sticky-top bg-light"
        style={{
          top: "-1.5rem",
          paddingTop: "1.5rem",
          marginTop: "-1.5rem",
          zIndex: 10,
        }}
      >
        <h4 className="fw-bold mb-0">{vehicles.length} vehicles to rent</h4>
        <div className="d-flex align-items-center gap-4 text-muted fs-sm">
          <div className="fw-medium text-dark cursor-pointer d-flex align-items-center gap-2">
            Closest to me <i className="fa-solid fa-chevron-down"></i>
          </div>
          <div className="cursor-pointer d-flex align-items-center gap-2">
            Hide map <i className="fa-regular fa-map"></i>
          </div>
        </div>
      </div>

      {vehicles.map((vehicle, index) => (
        <VehicleCard key={index} {...vehicle} />
      ))}
    </div>
  )
}
