import { NavLink } from "react-router-dom"

export default function Link({
  name,
  icon,
  to = "#",
}: {
  name: string
  icon: string
  to?: string
}) {
  return (
    <NavLink
      to={to}
      className={({ isActive }) =>
        `nav-link-custom ${isActive ? "active" : ""}`
      }
    >
      <i className={icon}></i>
      <span>{name}</span>
    </NavLink>
  )
}
