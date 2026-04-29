import VehicleCard from "./VehicleCard"

const vehicles = [
  {
    name: "Audi A4",
    model: "2.0 TFSI Sport (249 hp, Quattro)",
    price: 24.59,
    image: "https://images.unsplash.com/photo-1606664515524-ed2f786a0bd6?auto=format&fit=crop&q=80&w=800",
    distance: "120m (4 min)",
    rating: 4.7,
    reviews: 109,
  },
  {
    name: "Opel Insignia",
    model: "2.0 Turbo Grand Sport (230 hp, AWD)",
    price: 19.99,
    image: "https://images.unsplash.com/photo-1549399542-7e3f8b79c341?auto=format&fit=crop&q=80&w=800",
    distance: "250m (8 min)",
    rating: 4.0,
    reviews: 87,
  },
  {
    name: "Mazda 6",
    model: "2.5 Turbo Premium (250 hp, AWD)",
    price: 22.99,
    image: "https://images.unsplash.com/photo-1568605117036-5fe5e7bab0b7?auto=format&fit=crop&q=80&w=800",
    distance: "90m (3 min)",
    rating: 5.0,
    reviews: 766,
    isFavorite: true,
  },
]

export default function VehicleList() {
  return (
    <div className="vehicles-panel p-4 h-100 flex-shrink-0 position-relative">
      <div
        className="d-flex justify-content-between align-items-center mb-4 sticky-top bg-light"
        style={{ top: "-1.5rem", paddingTop: "1.5rem", marginTop: "-1.5rem", zIndex: 10 }}
      >
        <h4 className="fw-bold mb-0">48 vehicles to rent</h4>
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
