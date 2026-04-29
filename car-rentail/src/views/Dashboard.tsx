import Sidebar from "../components/Sidebar/Sidebar"
import TopBar from "../components/TopBar"
import Filters from "../components/Filters"
import VehicleList from "../components/VehicleList"
import Map from "../components/Map"

export default function Dashboard() {
  return (
    <div className="d-flex" style={{ height: "100vh", overflow: "hidden" }}>
      <Sidebar />
      <div className="flex-grow-1 d-flex flex-column overflow-hidden h-100">
        <TopBar />
        <div className="d-flex flex-grow-1 overflow-hidden">
          <Filters />
          <VehicleList />
          <Map />
        </div>
      </div>
    </div>
  )
}
