const btn = document.querySelector('.js-button')
const btnText = btn.textContent
const width = btn.clientWidth
const height = btn.clientHeight
const svg = Snap(width, height)
const color1 = '#FFFFFF'
const gradient = 'L(0, 0, 300, 300)#0575E6-#021B79'
const maskOffset = btn.clientHeight

const border = svg
  .rect(0, 0, width, height)
  .attr({ 'fill': 'none', 'stroke': color1, 'stroke-width': 4, 'class': 'border' })

const mask = svg
  .path(`M0,0 L${width + maskOffset},0 L${width},${height} L-${maskOffset}, ${height} Z`)
  .attr({ 'fill': 'white', 'stroke': 'white', 'class': 'mask', 'stroke-width': 0 })
  .transform(`t-${width + maskOffset},0`)

const maskInvert = mask
  .clone()
  .transform('t0,0')

const text = svg
  .text(width / 2, height / 2, btnText)
  .attr({ 'text-anchor': 'middle', 'dominant-baseline': 'central', 'fill': color1 })

const button = svg
  .group(text, border)
  .attr({ mask: maskInvert })

const textMasked = text
  .clone()
  .attr({ 'fill': gradient })

const borderMasked = border
  .clone()
  .attr({ 'stroke': gradient })

const masked = svg
  .group(textMasked, borderMasked)
  .attr({ mask })

svg.hover(
  () => {
    mask.attr('stroke-width', 4)
    mask.stop().animate({ transform: 't0,0' }, 500, mina.easein )
    maskInvert.stop().animate({ transform: `t${width + maskOffset},0` }, 500, mina.easein )
  },
  () => {
    mask.stop().animate({ transform: `t-${width + maskOffset},0` }, 350, mina.easeout, () => mask.attr('stroke-width', 0))
    maskInvert.stop().animate({ transform: 't0,0' }, 350, mina.easeout)
  }
)

svg.click(() => btn.click())
btn.replaceWith(svg.node)