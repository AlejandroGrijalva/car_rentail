import type VehicleProps from "../interface/VehicleCard"

export default function VehicleCard({
  name,
  model,
  daily_rate,
  mileage,
  year,
  status,
  is_premium,
  image,
  price,
}: VehicleProps) {
  console.log(`${import.meta.env.VITE_API_ASSETS}/cars/${image}`)
  return (
    <div className="car-card">
      <div className="d-flex justify-content-between align-items-center mb-3">
        <div className="d-flex align-items-center gap-3 fs-sm fw-medium">
          <div className="text-dark">
            <i className="fa-solid fa-gauge-high text-muted me-2"></i>
            {mileage?.toLocaleString()} mi
          </div>
          <div className="text-dark">
            <i className="fa-solid fa-calendar text-muted me-2"></i>
            {year}
          </div>
        </div>
        {is_premium ? (
          <span className="badge bg-warning text-dark">
            <i className="fa-solid fa-star"></i> Premium
          </span>
        ) : (
          <span className="badge bg-secondary text-white text-capitalize">
            {status}
          </span>
        )}
      </div>
      <img
        src={`${import.meta.env.VITE_API_ASSETS}cars/${image}`}
        className="car-img"
        alt={name}
      />
      <div className="d-flex justify-content-between align-items-end mt-3">
        <div>
          <h5 className="fw-bold mb-1">{name}</h5>
          <div className="text-muted fs-sm">{model}</div>
        </div>
        <div className="text-end">
          <span className="fs-5 fw-bold">${price}</span>
          <span className="text-muted fs-sm"> / day</span>
        </div>
      </div>
    </div>
  )
}
