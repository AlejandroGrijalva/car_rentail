import Link from "./Link"
export default function Sidebar() {
  return (
    <>
      <div className="sidebar py-4 px-3 d-flex flex-column justify-content-between flex-shrink-0">
        <div>
          <div className="d-flex align-items-center mb-5 px-2">
            <div className="logo-icon me-3">
              <svg
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path d="M12 2L2 7L12 12L22 7L12 2Z" fill="currentColor" />
                <path
                  d="M2 17L12 22L22 17M2 12L12 17L22 12"
                  stroke="currentColor"
                  strokeWidth="2"
                  strokeLinecap="round"
                  strokeLinejoin="round"
                />
              </svg>
            </div>
            <span
              className="fs-6 fw-bold lh-1"
              style={{ letterSpacing: "-0.5px" }}
            >
              CAR
              <br />
              RENTAL
            </span>
          </div>
          <nav className="nav flex-column gap-1">
            <Link to="/" name="Home" icon="fa-solid fa-house fa-fw" />
            <Link to="/vehicles" name="Vehicles" icon="fa-solid fa-car fa-fw" />
            <Link
              to="/notes"
              name="Notes"
              icon="fa-regular fa-note-sticky fa-fw"
            />
            <Link
              to="/favourites"
              name="Favourites"
              icon="fa-regular fa-heart fa-fw"
            />
            <Link
              to="/recents"
              name="Recents"
              icon="fa-solid fa-clock-rotate-left fa-fw"
            />
            <div className="my-2"></div>
            <Link
              to="/notifications"
              name="Notifications"
              icon="fa-regular fa-bell fa-fw"
            />
            <Link to="/chat" name="Chat" icon="fa-regular fa-comment fa-fw" />
          </nav>
        </div>

        <nav className="nav flex-column gap-1">
          <Link
            to="/license"
            name="License"
            icon="fa-regular fa-id-card fa-fw"
          />
          <Link
            to="/support"
            name="Support"
            icon="fa-regular fa-circle-question fa-fw"
          />
          <Link
            to="/logout"
            name="Logout"
            icon="fa-solid fa-arrow-right-from-bracket fa-fw"
          />
        </nav>
      </div>
    </>
  )
}
