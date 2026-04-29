interface VehicleProps {
  name: string
  model: string
  price: number
  image: string
  distance: string
  rating: number
  reviews: number
  isFavorite?: boolean
}

export default function VehicleCard({
  name,
  model,
  price,
  image,
  distance,
  rating,
  reviews,
  isFavorite = false,
}: VehicleProps) {
  return (
    <div className="car-card">
      <div className="d-flex justify-content-between align-items-center mb-3">
        <div className="d-flex align-items-center gap-3 fs-sm fw-medium">
          <div className="text-dark">
            <i className="fa-solid fa-person-walking text-muted me-2"></i>
            {distance}
          </div>
          <div className="text-warning">
            <i className="fa-solid fa-star"></i>{" "}
            <span className="text-dark">
              {rating} <span className="text-muted fw-normal">({reviews})</span>
            </span>
          </div>
        </div>
        <i
          className={`${
            isFavorite ? "fa-solid text-danger" : "fa-regular text-muted"
          } fs-5 cursor-pointer hover-danger`}
        ></i>
      </div>
      <img src={image} className="car-img" alt={name} />
      <div className="d-flex justify-content-between align-items-end mt-3">
        <div>
          <h5 className="fw-bold mb-1">{name}</h5>
          <div className="text-muted fs-sm">{model}</div>
        </div>
        <div className="text-end">
          <span className="fs-5 fw-bold">${price}</span>
          <span className="text-muted fs-sm"> / hour</span>
        </div>
      </div>
    </div>
  )
}
