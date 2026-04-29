export default function Map() {
  return (
    <div className="map-panel h-100 flex-grow-1 position-relative">
      <div className="map-bg"></div>

      {/* Search Bar */}
      <div className="search-bar-map d-flex align-items-center bg-white shadow-sm rounded-pill px-4 py-3 mt-4 mx-auto position-relative z-1">
        <i className="fa-solid fa-search text-muted fs-5"></i>
        <input
          type="text"
          placeholder="Search address or vehicles..."
          className="ms-3 border-0 bg-transparent w-100 fs-sm"
          style={{ outline: "none" }}
        />
      </div>

      {/* Right floating controls */}
      <div
        className="position-absolute d-flex flex-column gap-2 z-1"
        style={{ top: "1.5rem", right: "1.5rem" }}
      >
        <button
          className="btn btn-white bg-white shadow-sm rounded-circle d-flex align-items-center justify-content-center"
          style={{ width: "40px", height: "40px" }}
        >
          <i className="fa-solid fa-expand text-dark"></i>
        </button>
      </div>

      <div
        className="position-absolute d-flex flex-column bg-white shadow-sm rounded-3 overflow-hidden z-1"
        style={{ bottom: "2rem", right: "1.5rem" }}
      >
        <button className="btn btn-white px-3 py-2 border-bottom border-light">
          <i className="fa-solid fa-plus text-dark"></i>
        </button>
        <button className="btn btn-white px-3 py-2">
          <i className="fa-solid fa-minus text-dark"></i>
        </button>
      </div>

      <div
        className="position-absolute d-flex flex-column z-1"
        style={{ bottom: "2rem", right: "5rem" }}
      >
        <button
          className="btn btn-dark rounded-circle d-flex align-items-center justify-content-center shadow"
          style={{ width: "40px", height: "40px" }}
        >
          <i className="fa-solid fa-location-crosshairs text-white"></i>
        </button>
      </div>

      {/* Mock map elements (route and pins) */}
      <svg className="position-absolute w-100 h-100 top-0 start-0 pointer-events-none z-0">
        <path
          d="M 280 480 L 320 450 L 370 460 L 450 380 L 520 390 L 580 250 L 680 280 L 720 220"
          stroke="#1a1a1a"
          strokeWidth="4"
          fill="none"
          strokeLinejoin="round"
          strokeLinecap="round"
        />
      </svg>

      {/* Route markers */}
      <div
        className="position-absolute bg-success rounded-circle border border-white border-2 z-1 shadow"
        style={{ width: "14px", height: "14px", top: "473px", left: "273px" }}
      ></div>
      <div
        className="position-absolute bg-dark rounded-circle border border-white border-2 z-1 shadow"
        style={{ width: "18px", height: "18px", top: "211px", left: "711px" }}
      ></div>

      {/* Pins */}
      <div className="map-pin-dark" style={{ top: "25%", left: "20%" }}>
        2
      </div>
      <div className="map-pin-dark" style={{ top: "75%", left: "35%" }}>
        3
      </div>
      <div className="map-pin-dark" style={{ bottom: "10%", right: "20%" }}>
        5
      </div>
      <div className="map-pin-dark" style={{ top: "20%", right: "10%" }}>
        6
      </div>

      {/* Active Car Popup (VW Golf GTI) */}
      <div
        className="position-absolute z-2"
        style={{ top: "150px", right: "5rem" }}
      >
        <div
          className="bg-white rounded-4 shadow-lg p-3"
          style={{ width: "260px", position: "relative" }}
        >
          <div className="d-flex justify-content-between align-items-center mb-2">
            <div className="text-warning fs-sm fw-bold">
              <i className="fa-solid fa-star"></i>{" "}
              <span className="text-dark">
                4.9 <span className="text-muted fw-normal">(189)</span>
              </span>
            </div>
            <div
              className="bg-light rounded-circle d-flex align-items-center justify-content-center cursor-pointer"
              style={{ width: "28px", height: "28px" }}
            >
              <i className="fa-regular fa-heart text-muted fs-sm"></i>
            </div>
          </div>
          <img
            src="https://images.unsplash.com/photo-1541899481282-d53bffe3c35d?auto=format&fit=crop&q=80&w=400"
            className="w-100 rounded mb-2"
            style={{ height: "120px", objectFit: "cover" }}
            alt="VW Golf GTI"
          />
          <div className="fs-sm fw-bold mb-1">VW Golf GTI</div>
          <div className="text-muted mb-3" style={{ fontSize: "11px" }}>
            2.0 TSI Autobahn (241 hp, FWD)
          </div>
          <button className="btn btn-dark w-100 btn-sm d-flex justify-content-between align-items-center px-3 py-2 rounded-3">
            <span className="fw-medium">Book</span>
            <span className="fw-bold">$20/h</span>
          </button>
          <div
            className="position-absolute"
            style={{
              bottom: "-8px",
              left: "50%",
              transform: "translateX(-50%)",
              borderWidth: "10px 10px 0",
              borderStyle: "solid",
              borderColor: "white transparent transparent transparent",
              filter: "drop-shadow(0px 2px 2px rgba(0,0,0,0.1))",
            }}
          ></div>
        </div>
      </div>
    </div>
  )
}
