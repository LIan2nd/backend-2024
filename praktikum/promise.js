const berenang = () => {
  return new Promise((resolve) => {
    setTimeout(() => {
      resolve("berenang selesai.")
    }, 6000);
  })
}

const bersepeda = () => {
  return new Promise((resolve) => {
    setTimeout(() => {
      resolve("bersepeda selesai.")
    }, 2000);
  })
}

const berlari = () => {
  return new Promise((resolve) => {
    setTimeout(() => {
      resolve("berlari selesai.")
    }, 4000);
  })
}

const triathlon = async () => {
  console.log(await berenang());
  console.log(await bersepeda());
  console.log(await berlari());
}

triathlon();